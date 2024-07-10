pipeline{
    agent any

    stages {
        stage('Checkout'){
            steps{
                git branch: 'main', url: 'https://github.com/jacintoluistest/petsphp.git'
            }
        }

        stage('Deploy'){
            steps{
                echo 'Deploying'
                // Example: Copy files to server directory
                sh 'rsync -avz --exclude=".git" ./Users/ljacinto/.jenkins/workspace/* ljacinto@localhost:/Applications/XAMPP/htdocs/pet_crud_app'
                // Replace `user@server:/path/to/server/directory` with your server details

            }
    }

    }
}