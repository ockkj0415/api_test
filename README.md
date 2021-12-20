# api_test

언어 : php 7.4
Framework : Codeigniter 4

실행 방식

1. nginx 설치
2. nginx config 파일 내 root 로 프로젝트폴더위치/public 으로 세티
3. nginx 서비스 실행
4. php.ini 에서 owner / listener -> nginx 로 변경
5. php-cgi 실행
6. api 사용
- nginx 사용시 writable 폴더 소유권 nginx 로 변경 필요

또는 php 설치되어있다면,
php spark serve 를 통해 localhost:8080 으로 접근



#수정한 파일

app/controller 내의 v2 폴더 내 파일 [Cylinder.php / Health.php / Sigungu.php]
app/config 내의 파일 [routes.php / database.php]
app/models 내의 파일 [City.php / Info.php]
