<?php
class Config
{
    /**
     * Este arquivo nao deve ser excluido. 
     * Apenas copia e renomeia a copia para config.php
     */

    /**    
     * Se for utilizar o gmail acesse a conta de email vai até
     * Conta > Seguranca > e permita Acesso de APP menos seguro.
     * https://myaccount.google.com/security
     */
    const PASSWORD_MAIL = "********"; //Senha a ser usada para autenticação SMTP
    const USERNAME_MAIL = "seu-email@gmail.com"; ////Nome de usuário a ser usado para autenticação SMTP - use o endereço de e-mail completo para o gmail
    const NOREPLAY_MAIL = "seu-email@gmail.com"; //Defina de quem a mensagem deve ser enviada
    const SENT_MAIL = "seu-email@gmail.com"; //Defina para quem a mensagem deve ser enviada


}
