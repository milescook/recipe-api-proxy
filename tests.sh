#!/bin/sh

./bin/phpstan analyse -l 1 src
./bin/phpspec run