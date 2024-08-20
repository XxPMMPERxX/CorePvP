docker run --rm -it -v "$(pwd):/workspace" -w /workspace keinos/sqlite3 sh -c '
if [ ! -e ./resources/test.db ]; then
  touch ./resources/test.db;
fi

for sqlFile in $(ls ./resources | grep -E "^.*\.sql"); do
   sqlite3 ./resources/test.db < ./resources/$sqlFile;
done
'
