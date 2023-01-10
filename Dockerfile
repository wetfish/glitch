FROM docker.io/node:14 AS npm

COPY ./public_html /public_html

RUN set -exu \
  && cd /public_html \
  && npm install

FROM docker.io/php:5.6-fpm-alpine

COPY --from=npm /public_html /var/www

RUN set -exu \
  && addgroup --gid 1101 fishy \
  && adduser \
      --uid 1101 \
      --ingroup fishy \
      --no-create-home \
      --shell /sbin/nologin \
      --disabled-password \
      fishy \
  && chown -R fishy:fishy /var/www

USER fishy

# Expose port 9000 and start php-fpm server
EXPOSE 9000

WORKDIR /var/www

CMD ["php-fpm"]
