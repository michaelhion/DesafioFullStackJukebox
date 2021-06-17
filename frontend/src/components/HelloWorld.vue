<template>
  <div class="hello">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nome completo</th>
          <th scope="col">Email</th>
          <th scope="col">Telefone</th>
          <th scope="col">Pj</th>
          <th scope="col">Cnpj</th>
          <th scope="col">cpf</th>
          <th scope="col">Editar</th>
          <th scope="col">Excluir</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-secondary" v-for="pessoa of pessoas" :key="pessoa.id">
          <td>{{ pessoa.nome + " " + pessoa.sobrenome }}</td>
          <td>{{ pessoa.email }}</td>
          <td>{{ pessoa.telefone }}</td>
          <td>{{ pessoa.pessoaJuridica }}</td>
          <td>{{ pessoa.cnpj }}</td>
          <td>{{ pessoa.cpf }}</td>
          <td>
            <a
              ><img
                src="../../src/assets/editar.png"
                alt="editar"
                srcset=""
                @click="editar(pessoa)"
            /></a>
          </td>
          <td>
            <a
              ><img
                src="../../src/assets/excluir.png"
                alt="excluir"
                srcset=""
                @="excluir(pessoa)"
            /></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import Pessoa from "../service/pessoa";
export default {
  name: 'HelloWorld',
  data() {
    return {
      pessoa: {
        id: "",
        nome: "",
        sobrenome: "",
        email: "",
        telefone: "",
        pessoaJuridica: "",
        cpf: "",
        cnpj: "",
      },
      pessoas: [],
    };
  },
  mounted() {
    this.listar();
  },
  methods: {
    listar() {
      Pessoa.listar().then((resposta) => {
        this.pessoas = resposta.data.data;
      })
    },
    editar(pessoa) {
      this.pessoa = pessoa;
    },
    excluir(pessoa) {
      Pessoa.exclui(pessoa)
        .then((resposta) => {
          console.log(resposta);
          this.listar();
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
