#!/bin/bash
mkdir /var/www/html/ptsi/storage/framework/cache/data
chown -R ec2-user:apache /var/www
service httpd start