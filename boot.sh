#! /bin/bash
set -e
DOCKER_NAME='guacamole-client'

if [[ $# < 1 ]]; then
  echo "SecretKey cannot be null, Usage: sh boot.sh <SecretKey>"
  exit 1
fi

inst=$(docker ps -qaf name=${DOCKER_NAME})
if [[ ! -z $inst ]]; then
    docker stop $inst 2>/dev/null
        docker rm $inst
fi


SECRETKEY=`printf ${1}|md5sum|tr -d " -"`

docker run -d \
        -p 8080:8080 \
        -e SECRETKEY=${SECRETKEY} \
        --name=${DOCKER_NAME} \
        docker.io/dongshufeng/guacamole-connect:latest

echo "add the following SecretKey to your code"
echo "$SECRETKEY"
