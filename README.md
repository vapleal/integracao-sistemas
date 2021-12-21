# integracao-sistemas
Modelo de integração entre sistemas web e desktop para estudo. <br>
Projeeto desenvolvido em C#, PHP, HTML, CSS, Javascript com bancos de  dados MySQL e SQL Server

# Utilização:
1 - Restaure os bancos de dados da pasta suporte: site -> mysql, desktop -> sql server local db <br>
2 - Configure o site no seu servidor (no original foi utilizado o apache) <br>
3 - Será preciso usar o FTP com usuário e senha, no Xampp / Lampp existe um embutido, trocar ou usar os mesmos dados de SoftHouse.cs <br>
4 - Quando uma nova Soft House é cadastrada é gerado o arquivo de integração, o script pode ser visto em script/cadDesenv.php <br>
5 - Ao rodar o projeto desktop (integra_gg) ele busca o arquivo no ftp e faz o insert no banco local
