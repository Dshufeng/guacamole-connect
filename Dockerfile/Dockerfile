FROM guacamole/guacd:latest
MAINTAINER dsf

USER root

RUN yum clean all && \
    yum update -y && \
    yum install -y nodejs npm \
    yum install -y supervisor \

#RUN sudo mkdir -p /var/log/supervisor

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY guacamole.js /etc/guacamole.js

RUN npm install --save guacamole-lite

EXPOSE 8080

CMD ["/usr/bin/supervisord"] 
