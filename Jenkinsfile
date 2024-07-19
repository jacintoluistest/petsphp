pipeline{
    agent any
   

    stages {
        stage('Checkout Pet App'){
            steps{
                echo 'Getting Pet App'
                git branch: 'main', url: 'https://github.com/jacintoluistest/petsphp.git'
            }
        }

        stage('Write Build Number'){
            steps{
                script{
                    
                    // Write the build number to a file
                    def buildNumberFile = "${env.WORKSPACE}/build_number.txt"
                    writeFile file: buildNumberFile, text: "${env.BUILD_NUMBER}"
                }
            }
        }

        
        stage('Deploy'){
            steps{
                echo 'Deploying'
                script{
                    def sourceDir="${env.WORKSPACE}"
                    def desDir="/Applications/XAMPP/htdocs/pet_crud_app"

                    sh "cp -r ${sourceDir}/* ${desDir}/"
                }

            }
        }
        
    }
}