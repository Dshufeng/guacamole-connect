FROM guacamole/guacd:latest
MAINTAINER dsf

USER root

RUN yum clean all && \
    rm -rf /var/cache/yum/*

RUN yum install -y nodejs npm && \
    yum install -y supervisor && \
    rm -rf /var/cache/yum/*

RUN npm install --save guacamole-lite

ADD guacamole.js /etc/guacamole.js
ADD supervisord.ini /etc/supervisord.d/supervisord.ini

EXPOSE 8080

CMD ["/usr/bin/supervisord"] 
