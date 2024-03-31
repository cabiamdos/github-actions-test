
FROM alpine:3.11

COPY entrypoint.sh /entrypoint.sh
# este run no lo hace él, él hace en su propia máquina.
RUN chmod +x entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
# CMD [""]