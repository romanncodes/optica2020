new Vue({
  el: "#app",
  data: {
    rut: "",
    clave: "",
    url: "http://localhost/Optica_2020/",
  },
  methods: {
    login: async function () {
      const recurso = "controllers/ControlLogin.php";
      var form = new FormData();
      form.append("rut", this.rut);
      form.append("clave", this.clave);
      try {
        const res = await fetch(this.url + recurso, {
          method: "post",
          body: form,
        });
        const data = await res.json();
        if (data.error) {
          M.toast({ html: data.error });
        } else {
          window.location = this.url + data.ruta;
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
});
