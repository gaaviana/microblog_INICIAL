<?php 
namespace Microblog\Auth;

/* Sobre sessões no php
Sessões (SESSION) é uma funcionalidade usada para controle de acesso e outras informações que sejam importantes enquanto o navegador estiver aberto com o site.

exemplos: áreas administrativas, painel de controle/dashboard, aréa do Cliente, aréa do aluno etc.

Nestas áreas o acesso se dá através de alguma forma de atenticação. Exemplos: login/senha, biometria, facial, 2-fatores etc.
*/

final class ControleDeAcesso {

    private function __construct() { }

    /* Inicia uma sessõa caso não tenha nenhuma em andamento */
    private static function iniciarSessao():void {
        if(!isset($_SESSION)) session_start();
    }

    /* bloqueia paginas adm caso o usuario não esteja logado */
    public function exigirLogin() : void {

        /* inicia sessao (se necessário) */
        self::iniciarSessao();

        /* se NÃO EXISTIR uma variável de sessão chamada ID */
        if (!isset($_SESSION['id'])) {
            session_destroy();
            header("location:../login.php?acesso_proibido");
            exit;
        }
    }
}