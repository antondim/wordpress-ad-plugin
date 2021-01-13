# wordpress-ad-plugin

Wordress plugin, that displays google's test ad (banner) after second paragraph of a post

## Prerequisites
- Linux OS
- Docker installation ([guide](https://docs.docker.com/engine/install/))

## Set things up

**1) docker wordpress development enviroment** :


```
git clone https://github.com/antondim/wordpress-ad-plugin.git
```

- Create a folder for docker local wordpress enviroment (e.g wordpress_folder)


- copy the docker-compose.yaml file inside the created 'wordpress_folder' and move inside the folder
 
 - On a terminal use:
```
docker-compose up -d
```
to build the enviroment

- copy 'myad-plugin' folder of repository inside the created docker volume folder '~/path_to_wordpress_folder/html/wp-content/plugins'

**2)Through a browser connect to wordpress local test site on 8080 port** :

```
localhost:8080
```
**3) Create a wordpress account**

**4) Log in using your account's settings**

**5) Activate 'MyAd plugin' browsing into ' Plugins - Installed Plugins' of wordpress site side panel**

**6) Publish a post with two or more paragraphs**

**7) View the post. The ad should be visible after paragraph two of your post**

Disable browser's ad-block if already enabled



