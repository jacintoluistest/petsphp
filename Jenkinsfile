pipeline{
    agent any
   // environment{
    //    MAVEN_HOME = tool name: 'Maven', type:'maven'
    //}

    stages {
        stage('Checkout Pet App'){
            steps{
                echo 'Getting Pet App'
                git branch: 'main', url: 'https://github.com/jacintoluistest/petsphp.git'
            }
        }

        stage ('Checkout Pet Tests'){
            steps{
                echo 'Getting Pet App Tests'
                git branch: 'main', url:'https://github.com/jacintoluistest/petsTests.git'
            }
        }

        stage('Build'){
            steps{
                echo 'Building...'
                echo 'Ensure Java is Available'
                    script{
                        if (!isUnix()) {
                        env.PATH = "${tool name: 'JDK21', type: 'jdk'}/bin:${env.PATH}"
                         } else {
                                env.PATH = "${tool name: 'JDK21', type: 'jdk'}/bin:${env.PATH}"
                                }
                    }

                    // Build the project using Maven
                    sh "${MAVEN_HOME}/bin/mvn clean install"
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

       stage('Test') {
            steps {
                // Run Cucumber tests using Maven
                sh "export PATH=$PATH:${MAVEN_HOME}/bin/mvn test"
            }
        }
        
        stage('Report') {
            steps {
                // Publish Cucumber reports (adjust paths as needed)
                cucumber fileIncludePattern: '**/target/cucumber-reports/*.json'
            }
        }

    }
}