new Vue({
  el: "#app",
  data: {
    rut: "",
    nombre: "",
    estadoEdit: false,
    vendedores: [],
    vendedor: {},
    url: "http://localhost/Optica_2020/",
  },
  methods: {
    crearVendedor: async function () {
      const recurso = "controllers/CrearVendedor.php";
      var form = new FormData();
      form.append("rut", this.rut);
      form.append("nombre", this.nombre);

      try {
        const res = await fetch(this.url + recurso, {
          method: "post",
          body: form,
        });
        const data = await res.json();
        M.toast({ html: data.msg });
        this.cargaVendedores();
        this.rut = "";
        this.nombre = "";
      } catch (error) {
        console.log(error);
      }
    },
    cargaVendedores: async function () {
      const recurso = "controllers/vendedores.php";
      try {
        const res = await fetch(this.url + recurso);
        const data = await res.json();
        this.vendedores = data;
      } catch (error) {
        console.log(error);
      }
    },
    activarEdit: function (vendedor) {
      this.vendedor = vendedor;
      this.estadoEdit = true;
      document.getElementById("rut").focus();
      document.getElementById("nombre").focus();
    },
    cancelarEdit() {
      this.estadoEdit = false;
      M.toast({ html: "Acción Cancelada" });
      this.cargaVendedores();
    },
    editarVendedor: async function () {
      const recurso = "controllers/EditarVendedor.php";
      var form = new FormData();
      form.append("rut", this.vendedor.rut);
      form.append("estado", this.vendedor.estado);

      try {
        const res = await fetch(this.url + recurso, {
          method: "post",
          body: form,
        });
        const data = await res.json();
        this.estadoEdit = false;
        M.toast({ html: data.msg });
        this.cargaVendedores();
      } catch (error) {
        console.log(error);
      }
    },
  },
  created() {
    this.cargaVendedores();
  },
});
