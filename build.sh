#!/bin/bash
start=`date +%s`

#### START Cleaning docker environment during development
sudo rm -rf project_database/

sudo docker rm project_app project_database project_phpmyadmin -f
# docker rmi project_app -f

#### END Cleaning docker environment during development

#### START Builing docker containers -------------------------------

sudo docker-compose up -d

sudo sudo chmod -R 777 app/
#### END Builing docker containers ---------------------------------

#### START Configuring (project_app) microservice ----------------------
while ! sudo docker exec project_database mysqladmin --user=root --password=secret --host "127.0.0.1" ping --silent &> /dev/null ; do
echo "... Waiting for Database to be deployed ..."
sleep 5
done
echo "... Database has been deployed successfully ..."


#### END Configuring (project_app) microservice ----------------------

end=`date +%s`
runtime=$((end-start))

echo "Project is successfully built in" $runtime "seconds"