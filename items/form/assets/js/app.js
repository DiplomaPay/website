class FormSubmit {
  constructor(settings) {
    this.settings = settings;
    this.form = document.querySelector(settings.form);
    this.formButton = document.querySelector(settings.button);
    if (this.form) {
      this.url = this.form.getAttribute("action");
    }
    this.sendForm = this.sendForm.bind(this);
  }

  displaySuccess() {
    this.form.innerHTML = this.settings.success;
  }

  displayError() {
    this.form.innerHTML = this.settings.error;
  }

  getFormObject() {
    const formObject = {};
    const fields = this.form.querySelectorAll("[name]");
    let isValid = true;
  
    fields.forEach((field) => {
      const fieldName = field.getAttribute("name");
      if (field.type === "radio") {
        const selectedRadio = this.form.querySelector(`[name="${fieldName}"]:checked`);
        if (selectedRadio) {
          formObject[fieldName] = selectedRadio.value;
        } else {
          isValid = false;
        }
      } else {
        if (field.required && !field.value) {
          isValid = false;
        }
        formObject[fieldName] = field.value;
      }
    });
  
    return isValid ? formObject : null;
  }

  onSubmission(event) {
    event.preventDefault();
    event.target.disabled = true;
    event.target.innerText = "Enviando...";
  }

  async sendForm(event) {
    try {
      this.onSubmission(event); // Chame a função onSubmission antes de enviar o formulário
      const formObject = this.getFormObject();
      if (formObject) {
        await fetch(this.url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
          },
          body: JSON.stringify(formObject),
        });
        this.displaySuccess();
      } else {
        this.displayError();
      }
    } catch (error) {
      this.displayError();
      throw new Error(error);
    }
  }

  init() {
    if (this.form) this.formButton.addEventListener("click", this.sendForm);
    return this;
  }
}

const formSubmit = new FormSubmit({
  form: "[data-form]",
  button: "[data-button]",
  success: "<h1 class='success'>Mensagem enviada!</h1>",
  error: "<h1 class='error'>Não foi possível enviar sua mensagem.</h1>",
});
formSubmit.init();