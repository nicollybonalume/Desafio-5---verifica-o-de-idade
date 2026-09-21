# 📘 README – FORMULÁRIO COM VERIFICAÇÃO DE IDADE

## 👤 Identificação

**Nome:** Nicolly Silva Bonalume
**Turma:** 1IE-DS
**Professor:** Ignacio

---

## 📌 Descrição

Este projeto consiste em um formulário simples que solicita o **nome** e o **ano de nascimento** do usuário.
Após o envio, o sistema calcula a idade e verifica se o usuário tem permissão de acesso.

---

## 🧠 Funcionalidades

* 🖥️ Exibição de um formulário com:

  * Campo **Nome**
  * Campo **Ano de Nascimento**

* ⚙️ Processamento dos dados:

  * Cálculo automático da idade do usuário

* ✅ Validação de acesso:

  * Se a idade for **18 anos ou mais**:

    * Exibe: **"Acesso permitido, [Nome]!"**
    * Salva os dados no arquivo `log_acessos.txt`

* 🚫 Caso contrário:

  * Exibe: **"Acesso negado, [Nome]!"**

---

## 🛠️ Tecnologias utilizadas

* HTML
* Linguagem de programação (PHP)
* Manipulação de arquivos (`log_acessos.txt`)
