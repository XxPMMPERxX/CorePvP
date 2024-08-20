docker run --rm -it -v "$(pwd):/workspace" -w /workspace keinos/sqlite3 sh -c '
sqlite3 ./resources/test.db < ./resources/test.sql;
'
