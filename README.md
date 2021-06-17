# DesafioFullStackJukebox

## Descrição do Projeto
<p align="center">Desenvolvido com Laravel 8 e vuejs</p>

#Instalação back end <br>
* Abra o terminal cmd na pasta onde deseja baixar o projeto
* Digite `git clone https://github.com/michaelhion/DesafioFullStackJukebox.git`
* Instale o xamp caso não tenha (site : https://www.apachefriends.org/download.html)
* Copie e cole a pasta backend na pasta htdocs do xamp (no meu caso esta na pasta c:)
* Rode no terminal `php artisan migrate`
* Entre no arquivo .env e altere o campo `DB_PASSWORD` com sua senha do mysql
* Feito isso execute o servidor apache 
* O link do backend é para listar todos é http://localhost/backend/public/api/pessoas
* O link para listar por id ou atualizar ou deletar é http://localhost/backend/public/api/pessoas/{id}

#Instalação front end
* Abra a pasta onde foi feito o git clone da instalação do backend, entre na pasta front end
* Abra o terminal com a localização do arquivo do frontend digite no terminal `npm run serve`
* Acesse o link que estará na ultima linha do terminal. No meu caso foi http://localhost:8080/

feito isso desfrute do app e me de um feed back
