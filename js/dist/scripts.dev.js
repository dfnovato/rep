"use strict";

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Validator =
/*#__PURE__*/
function () {
  function Validator() {
    _classCallCheck(this, Validator);

    this.validations = ['data-min-length', 'data-max-length', 'data-only-letters', 'data-email-validate', 'data-required', 'data-equal', 'data-password-validate'];
  } // inicia a validação de todos os campos


  _createClass(Validator, [{
    key: "validate",
    value: function validate(form) {
      // limpa todas as validações antigas
      var currentValidations = document.querySelectorAll('form .error-validation');

      if (currentValidations.length) {
        this.cleanValidations(currentValidations);
      } // pegar todos inputs


      var inputs = form.getElementsByTagName('input'); // transformar HTMLCollection em arr

      var inputsArray = _toConsumableArray(inputs); // loop nos inputs e validação mediante aos atributos encontrados


      var isValid = true;
      inputsArray.forEach(function (input, obj) {
        // fazer validação de acordo com o atributo do input
        for (var i = 0; this.validations.length > i; i++) {
          if (input.getAttribute(this.validations[i]) != null) {
            // limpa string para saber o método
            var method = this.validations[i].replace("data-", "").replace("-", ""); // valor do input

            var value = input.getAttribute(this.validations[i]); // invoca o método

            if (!this[method](input, value)) isValid = false;
          }
        }
      }, this);

      if (isValid) {
        form.submit();
      }
    } // método para validar se tem um mínimo de caracteres

  }, {
    key: "minlength",
    value: function minlength(input, minValue) {
      var inputLength = input.value.length;
      var errorMessage = "O campo precisa ter pelo menos ".concat(minValue, " caracteres");

      if (inputLength < minValue) {
        this.printMessage(input, errorMessage);
        return false;
      }

      return true;
    } // método para validar se passou do máximo de caracteres

  }, {
    key: "maxlength",
    value: function maxlength(input, maxValue) {
      var inputLength = input.value.length;
      var errorMessage = "O campo precisa ter menos que ".concat(maxValue, " caracteres");

      if (inputLength > maxValue) {
        this.printMessage(input, errorMessage);
        return false;
      }

      return true;
    } // método para validar strings que só contem letras

  }, {
    key: "onlyletters",
    value: function onlyletters(input) {
      var re = /^[A-Za-z]+$/;
      ;
      var inputValue = input.value;
      var errorMessage = "Este campo n\xE3o aceita n\xFAmeros nem caracteres especiais";

      if (!re.test(inputValue)) {
        this.printMessage(input, errorMessage);
        return false;
      }

      return true;
    } // método para validar e-mail

  }, {
    key: "emailvalidate",
    value: function emailvalidate(input) {
      var re = /\S+@\S+\.\S+/;
      var email = input.value;
      var errorMessage = "Insira um e-mail no padr\xE3o matheus@email.com";

      if (!re.test(email)) {
        this.printMessage(input, errorMessage);
        return false;
      }

      return true;
    } // verificar se um campo está igual o outro

  }, {
    key: "equal",
    value: function equal(input, inputName) {
      var inputToCompare = document.getElementsByName(inputName)[0];
      var errorMessage = "Este campo precisa estar igual ao ".concat(inputName);

      if (input.value != inputToCompare.value) {
        this.printMessage(input, errorMessage);
        return false;
      }

      return true;
    } // método para exibir inputs que são necessários

  }, {
    key: "required",
    value: function required(input) {
      var inputValue = input.value;

      if (inputValue === '') {
        var errorMessage = "Este campo \xE9 obrigat\xF3rio";
        this.printMessage(input, errorMessage);
        return false;
      }

      return true;
    } // validando o campo de senha

  }, {
    key: "passwordvalidate",
    value: function passwordvalidate(input) {
      // explodir string em array
      var charArr = input.value.split("");
      var uppercases = 0;
      var numbers = 0;

      for (var i = 0; charArr.length > i; i++) {
        if (charArr[i] === charArr[i].toUpperCase() && isNaN(parseInt(charArr[i]))) {
          uppercases++;
        } else if (!isNaN(parseInt(charArr[i]))) {
          numbers++;
        }
      }

      if (uppercases === 0 || numbers === 0) {
        var errorMessage = "A senha precisa um caractere mai\xFAsculo e um n\xFAmero";
        this.printMessage(input, errorMessage);
        return false;
      }

      return true;
    } // método para imprimir mensagens de erro

  }, {
    key: "printMessage",
    value: function printMessage(input, msg) {
      // checa os erros presentes no input
      var errorsQty = input.parentNode.querySelector('.error-validation'); // imprimir erro só se não tiver erros

      if (errorsQty === null) {
        var template = document.querySelector('.error-validation').cloneNode(true);
        template.textContent = msg;
        var inputParent = input.parentNode;
        template.classList.remove('template');
        inputParent.appendChild(template);
      }
    } // remove todas as validações para fazer a checagem novamente

  }, {
    key: "cleanValidations",
    value: function cleanValidations(validations) {
      validations.forEach(function (el) {
        return el.remove();
      });
    }
  }]);

  return Validator;
}();

var form = document.getElementById('register-form');
var submit = document.getElementById('btn-submit');
var validator = new Validator(); // evento de envio do form, que valida os inputs

submit.addEventListener('click', function (e) {
  e.preventDefault();
  validator.validate(form);
}); // button show and hide

function myFunction() {
  var x = document.getElementById("myDIV");

  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}