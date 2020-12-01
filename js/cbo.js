new Vue({
  el: "#cargaCBO",
  data: {
    id_material_cristal: "",
    materiales: [],
    url: "http://localhost/Optica_2020/",
  },
  methods: {
    cargaMateriales: async function () {
      try {
        var recurso = "controllers/GetMaterialesCristal.php";
        const res = await fetch(this.url + recurso);
        const data = await res.json();
        console.log(data);
      } catch (error) {
        console.log(error);
      }
    },
  },
  created() {
    this.cargaMateriales();
  },
});
