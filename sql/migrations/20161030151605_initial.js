
exports.up = (knex, Promise) => {
  return knex.schema.createTable('todos', (table) => {
    table.bigIncrements('id').primary().unsigned()
    table.string('name')
    table.boolean('isDone').defaultTo(false)

    table.index('name')
  })
}

exports.down = (knex, Promise) => {
  return knex.schema.dropTableIfExists('todos')
}