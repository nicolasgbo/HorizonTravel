//Fazendo as validações no Front-end
document.addEventListener("DOMContentLoaded", () => {
    //Puxando o formulário pelo id
    const form = document.getElementById("formRegistrar")
    
    //Adicionando evento ao formulário de registro conforme cada campo.
    form.addEventListener("submit", function(evento){
        const nomeUsuario = form.nomeUsuario.value.trim() //Removendo espaços vazios no nome
        if(nomeUsuario.length < 3){
            evento.preventDefault() //Evita que o formulário seja enviado com erros
            alert("O nome precisa ter pelo menos 3 letras!")
            form.nomeUsuario.focus() //Da foco no campo 
            return //Para a execução
        }

        //Usando expressões regulares para validar que as as entradas não tenha caracteres especiais
        const regexNome = /^[A-Za-zÀ-ÿ\s]+$/
        if (!regexNome.test(nomeUsuario)){
            evento.preventDefault()
            alert("O nome deve conter apenas letras!")
            form.nomeUsuario.focus()
            return
        }
    
        //Validando o campo telefone
        const telefoneUsuario = form.telefoneUsuario.value.replace(/\D/g, "") //Remove o que não for número
        //Validando que a entrada não seja menor que 10 e maior que 11 devido ao DDD
        if(telefoneUsuario.length < 10 || telefoneUsuario.length > 11){
            evento.preventDefault()
            alert("Digite um telefone válido!")
            form.telefoneUsuario.focus()
            return
        } 

        //Validando o campo email
        const emailUsuario = form.emailUsuario.value.trim()
        //Expressão regular validando validando: algo antes do @, @ obrigatório, domínio depois do @, ponto antes do final e espera de .com .edu... 
        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        if (!regexEmail.test(emailUsuario)) {
            evento.preventDefault() //Evitando o evento padrão
            alert("Digite um e-mail válido!")
            form.emailUsuario.focus()
            return;
        }

        //Validando os campos de senha do usuário e confirmação de senha de usuário
        const senhaUsuario = form.senhaUsuario.value //Sem o trim por que a senha pode ter espaços em branco
        if(senhaUsuario.length < 6){
            evento.preventDefault()
            alert("A senha deve conter pelo menos 6 caracteres!")
            form.senhaUsuario.focus()
            return
        }
        //Confirmação de senha
        const confirmarSenhaUsuario = form.confirmarSenhaUsuario.value
        if(senhaUsuario !== confirmarSenhaUsuario){
            evento.preventDefault()
            alert("As senhas não coincidem!")
            form.confirmarSenhaUsuario.focus()
            return
        }
    })
})

