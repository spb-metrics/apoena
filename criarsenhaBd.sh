
function menu_alterar_senha_bd ()
{
    arquivox=dialog
    # verifica se a senha esta em branco
     mysql -u root -e "SELECT count(*) as total FROM mysql.user WHERE User='root'"  > /tmp/user 2> /dev/null
    
    banco=$( cat /tmp/user | sed '2!d' ) # pega somente a linha
    rm -f /tmp/user
    
    if [ $banco>="0" ] # se senha for em branco
    then

	mysql -u root -e "GRANT ALL ON *.* TO apoena@localhost IDENTIFIED BY '12345678' ;"

    else

  mysql -u apoena -p12345678 -e "SELECT count(*) as total FROM apoena.USU "  > /tmp/user 2> /dev/null
    
    banco=$( cat /tmp/user | sed '2!d' ) # pega somente a linha
    rm -f /tmp/user
    if [ $banco>="0" ] 
    then
        exit 0      
    else
        altera_senha_branco
        
    fi
    fi
}



function altera_senha_branco ()
{
    senha=$($arquivox --stdout \
                      --no-cancel \
                      --backtitle "Criação do Usuário apoena no BD Mysql" \
                      --insecure --title "Senha do BD Mysql" \
                      --passwordbox "Digite a senha de root do BD Mysql" \
                      -1 -1)
    
    senha=$( echo $senha | sed '1!d' )
    
    mysql -u root -p$senha -e "GRANT ALL ON apoena.* TO apoena@localhost IDENTIFIED BY '12345678' ;"
  
}

menu_alterar_senha_bd

exit 0 




















