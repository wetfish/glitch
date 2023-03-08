Ģ̧̛̳͙̮̞̺̠̯̥͈͈̭͖̦͌̃̃̓̄͂ͬͪ͝l̡̨̠̖͈͉̜͖̘̥͚̫̫̰͕͍̘̗̎̽͌͂̈́͘͞ͅiͬ̋̀̒͏͉̲̺̱̪̲͈͔̼͖̫̗̹̥̠̤͜t̸̺̲̼̬̟̠̗̗̼̙̘̻͕ͭ̃̒ͯ͘͠c̨͉̪̦̥̘̱̜̯͕̪̦̻̼̺͉̖̙̪̫̎̅͗̉̑ͩ̈́ͫ̏̇̍͒̕͡͡h͆̎ͦ͐ͣ͑ͦͬ̍͊ͬ̈̇̀ͩ̀͏̥̣͚̩̹̼̦͚̹̟͔͎̦̣f̈͋̒͡҉̴͈̺̱̣̻͙͝ī̷̞͇̰̟̞̯͕̘ͦ͒̽͐́̏̌ͪ̎̅ͦ͌ͯş̷ͣ͆̇̽̇͏̧̲̖̪̀ͅͅh̵͎͎̭͙̠̺̞̯̗͎͈̪̦̝̼̰̬̯̤ͣͣ̉͛͋̋͛̏͑̇ͫ͋̊̾̚͢͜
̡̛̛̳̝̯̣̟̮̳͔̤͕̟̲̫̔̐͋̈̔̾ͧͣ̚
͆̒̔̔̏ͣ̏ͣ̽͑̄ͮ̚͏͢҉̨͍̳̞̤̪̘͙̳͙̠͈̟̼̯͔ͅḮ̧̬̤͇̳͍͙͕̬̤̘͉̰͓̮͉̦̜̽̍̍ͯ̇͑ͧͪ̍̀͗̆̅̓̚͢m̷̶̡̡̪͚̳͚̯̙͖̯͍̯̪̗͆̍̃̆͑͋͊ͣ̇̿̔̈͟ảͮ̑͑͆ͪ̀͊̃̑͠҉̵̧̻͚̫̺̗̩͓̰̗̩̬̟͕̦̖̜ͅg̵̛̞͉̭̱̥̰͐̄̂̈̄ͦͯ̊ͯe̟̯͙̝̲̱͖͍͇͙͙̖̭̹̞͔͂̅̂̓ͣ͋̀͘ ̨̡̛̝̤̱̦͇̳̰͎̯̘͍̜̑ͫͮͯͫ̓̋͑͐̿͋̈́ͨ̏͂̈́g̷͖̣͕͈̫̥͉̬̯̘̟̫̳͌ͩ̎̋̉̎̋ͩ̐̑̎ͤ̏̽͊̒̋̕l̵̨̟͎̣̰̙̝̯̖̠͖̭̜̭͑̔̍ͦ͌̆̀̔̒̄̊ͣ̌͌̋̈͌́͜͡i̅̇͊̀́͐͐̄̇ͯ̿̀ͫ̀̚͏̞̜̞̞͖͇͚̘͚̮̞͢͠t̷̨͍͈͚̳̩̺͈̮̗̩̜͙̱̦̂̽̆ͫ̈́͑̔̑̈́ͨͦ̏̏̔̽ͨ̎̽ͧ͢͝ͅç̵̳̬̜̟̖̞͍̖̫̥̹͙͚̍͂͑̿ͅh̖͓͎̖͉̳̱̗͕̱͎̮̹̖͉̲͇ͫ̽̂̊́͢ͅę̫̝̥̝̼͈̠̤̤̰̪̠͇̣̼̱̱̉̈̿̓̂̄͆ͨ̓ͯ͛̂̕ͅr̡̤͉̟̳̭͚͙͚̞̤̳̀͛͒̅͟͠ͅ


## How do I deploy this container stack?

See [https://github.com/wetfish/production-manifests](https://github.com/wetfish/production-manifests)
for production deployment and full stack dev env info.

For development, to run just this stack, do 
```bash
docker compose \
  -f docker-compose.dev.yml \
  up -d \
  --build \
  --force-recreate

docker compose logs -f
```

The service will be available at [http://127.0.0.1:80](http://127.0.0.1:80)

## When do I need to rebuild the container?

Whenever you make an edit in public_html. \
If you're brave, you could bind mount in a devlopment directory to `/var/www`

