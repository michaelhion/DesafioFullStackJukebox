<template>
  <div id="cadastroContent">
    {{ pessoa.nome }}
    <form @submit.prevent="addP(pessoa)">
      <legend>Legend</legend>
      <div class="form-group">
        <label for="" class="form-label mt-4">Nome</label>
        <input
          type="text"
          class="form-control"
          id=""
          aria-describedby="emailHelp"
          placeholder="Digite seu nome"
          v-model="pessoa.nome"
        />
      </div>
      <div class="form-group">
        <label for="" class="form-label mt-4">Sobrenome</label>
        <input
          type="text"
          class="form-control"
          id=""
          aria-describedby="emailHelp"
          placeholder="Digite seu Sobrenome"
          v-model="pessoa.sobrenome"
        />
      </div>
      <div class="form-group">
        <label for="" class="form-label mt-4">Email</label>
        <input
          type="text"
          class="form-control"
          id=""
          aria-describedby="emailHelp"
          placeholder="Digite seu email"
          v-model="pessoa.email"
        />
      </div>
      <div class="form-group">
        <label for="" class="form-label mt-4">Telefone</label>
        <input
          type="text"
          class="form-control"
          id=""
          aria-describedby="emailHelp"
          placeholder="Digite seu telefone"
          v-model="pessoa.telefone"
        />
      </div>
      <div class="form-check">
        <label class="form-check-label" for="flexCheckDefault">
          Pessoa juridica? </label
        ><br />
        <select name="select" v-model="pessoa.pessoaJuridica">
          <option value="0" selected>Não</option>
          <option value="1">Sim</option>
        </select>
      </div>

      <div class="form-group" v-if="pessoa.pessoaJuridica != 1">
        <label for="" class="form-label mt-4">Cpf</label>
        <input
          type="text"
          class="form-control"
          id=""
          aria-describedby="emailHelp"
          placeholder="Digite seu cpf se for pf"
          v-model="pessoa.cpf"
        />
      </div>
      <div class="form-group" v-else>
        <label for="" class="form-label mt-4">Cnpj</label>
        <input
          type="text"
          class="form-control"
          id=""
          aria-describedby="emailHelp"
          placeholder="Digite seu nome se for pj"
          v-model="pessoa.cnpj"
        />
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br />
    <br />
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
                src=".\assets\editar.png"
                alt="editar"
                srcset=""
                @click="editar(pessoa)"
            /></a>
          </td>
          <td>
            <a
              ><img
                src=".\assets\excluir.png"
                alt="excluir"
                srcset=""
                @click="excluir(pessoa)"
            /></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>

import Pessoa from "./service/pessoa";
export default {
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
      });
    },
    addP(pessoa) {
      if (!pessoa.id) {
        if (pessoa.pessoaJuridica == "0") {
          pessoa.cnpj = 0
          Pessoa.addPessoa(this.pessoa)
            .then((response) => {
              this.pessoa = {};
              this.listar();
              console.log(response);
            })
            .catch((e) => {
              console.log(e.response.data);
            });
        } else {
          pessoa.cpf = 0
          Pessoa.addPessoa(this.pessoa)
            .then((response) => {
              this.pessoa = {};
              this.listar();
              console.log(response);
            })
            .catch((e) => {
              console.log(e.response.data);
            });
        }
      } else {
        console.log(pessoa);
        Pessoa.edita(this.pessoa)
          .then((response) => {
            this.pessoa = {};
            alert("atualizado!!");
            this.listar();
            console.log(response);
          })
          .catch((e) => {
            console.log(e.response.data);
          });
      }
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

<style>
#cadastroContent {
  margin-right: auto;
  margin-left: auto;
  width: 800px;
}
img {
  width: 20px;
  height: 20px;
}
</style>
