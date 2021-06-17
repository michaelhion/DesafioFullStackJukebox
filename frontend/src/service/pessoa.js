import {http} from './config'

export default{
    pessoas:{
        id:'',
        nome: "",
        sobrenome: "",
        email: "",
        telefone: "",
        pessoaJuridica: "",
        cpf: "",
        cnpj: "",
    },
    listar:()=>{
        return http.get('pessoas')
    },

    addPessoa:(pessoa)=> {
        return http.post('pessoas',pessoa)
    },

    edita:(pessoa)=> {
        return http.put('pessoas/'+ pessoa.id, pessoa)
    },
    exclui:(pessoas)=>{
        return http.delete('pessoas/'+pessoas.id,pessoas)
    }
}