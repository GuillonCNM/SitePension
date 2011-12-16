rm -f ../data/base-test.sql
touch ../data/base-test.sql
echo 'USE site1test;' > ../data/base-test.sql
mysqldump -usite1test -p0000 site1 >> ../data/base-test.sql
mysql -usite1test -p0000 < ../data/base-test.sql
