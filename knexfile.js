module.exports = {
  development: {
    client: 'mysql2',
    connection: {
      host: 'localhost',
      database: 'todos',
      user:     'todos',
      password: 'todos'
    },
    migrations: {
      tableName: 'knex_migrations',
      directory: 'sql/migrations'
    }
  }
}