exports.up = function (knex) {
  return knex.schema.createTable("attachments", (table) => {
    table.string("attachment_id").primary();
    table.string("attachment_file").notNullable();
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
  return knex.schema.dropTable("attachments");
};