FROM guacamole/guacd:latest
MAINTAINER dsf

USER root

RUN yum clean all && \
    yum update -y && \
    yum install -y nodejs npm \
    yum install -y supervisor \

RUN npm install --save guacamole-lite

COPY ./supervisord.ini /etc/supervisord.d/supervisord.ini
COPY ./guacamole.js /etc/guacamole.js

EXPOSE 8080

CMD ["/usr/bin/supervisord"] 
