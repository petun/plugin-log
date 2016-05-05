#!/bin/bash
if [ "$1" != "" ]; then
    vendor/bin/codecept run unit --no-colors -c tests/codeception/common/ tests/codeception/common/unit/"$1".php:$2
else
    vendor/bin/codecept run unit --no-colors -c tests/codeception/common/ --coverage --coverage-html --coverage-xml
fi
