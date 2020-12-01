new Vue({
  el: "#app",
  data: {
    rut: "",
    url: "http://localhost/Optica_2020/",
    cliente: {},
    esta: false,
  },
  methods: {
    buscar: async function () {
      const recurso = "controllers/BuscarCliente.php";
      var form = new FormData();
      form.append("rut", this.rut);
      try {
        const res = await fetch(this.url + recurso, {
          method: "post",
          body: form,
        });
        const data = await res.json();
        console.log(data);
        if (data == null) {
          M.toast({ html: "rut no encontrado" });
          this.esta = false;
          this.cliente = {};
        } else {
          this.cliente = data;
          this.esta = true;
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
  created() {},
});
