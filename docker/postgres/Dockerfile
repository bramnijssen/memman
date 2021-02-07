FROM postgres:13.1-alpine as prod

FROM prod as dev

COPY ./init.sql /docker-entrypoint-iitdb.d/
