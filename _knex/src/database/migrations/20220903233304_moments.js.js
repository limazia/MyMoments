exports.up = function (knex) {
  return knex.schema.createTable("moments", (table) => {
    table.string("moment_id").primary();
    table.string("moment_label").notNullable();
    table.string("moment_description");
    table.string("moment_attachments");
    table
      .string("user_id")
      .notNullable()
      .references("id")
      .inTable("users")
      .onDelete("CASCADE");

    table
      .timestamp("update_at")
      .defaultTo(knex.raw("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"));
    table.timestamp("created_at").defaultTo(knex.raw("CURRENT_TIMESTAMP"));
  });
};

exports.down = function (knex) {
  return knex.schema.dropTable("moments");
};