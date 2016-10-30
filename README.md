## Setup
```
make start-db

docker logs mysql // wait for db startup

make migrate

make start-server
```

Open http://localhost:3030/frontend/app