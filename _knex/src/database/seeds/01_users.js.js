exports.seed = function (knex) {
  return knex("users").insert([
    {
      id: "0361ddbbcc92022",
      name: "Acacio de Lima",
      email: "limadeacacio@gmail.com",
      password: "15584a29c5ccb4e1b018c88188be42c19611e7154a6355ddefcb6bd3c5e747da", // mama12
    },
  ]);
};