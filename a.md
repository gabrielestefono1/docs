# XML como uma DSL de Configuração Externa

Metadados de configuração baseados em XML configuram esses beans como elementos <bean/> dentro de um elemento <beans/> de nível superior. O exemplo a seguir mostra a estrutura básica dos metadados de configuração baseados em XML:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<beans xmlns="http://www.springframework.org/schema/beans"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemaLocation="http://www.springframework.org/schema/beans
		https://www.springframework.org/schema/beans/spring-beans.xsd">

	<bean id="..." class="...">
		<!-- collaborators and configuration for this bean go here -->
	</bean>

	<bean id="..." class="...">
		<!-- collaborators and configuration for this bean go here -->
	</bean>

	<!-- more bean definitions go here -->

</beans>
```

* O atributo id é uma string que identifica a definição individual do bean.
* O atributo class define o tipo do bean e utiliza o nome da classe completamente qualificado.

O valor do atributo id pode ser usado para se referir a objetos colaboradores. O XML para se referir a objetos colaboradores não é mostrado neste exemplo. Consulte Dependências para mais informações.

Para instanciar um contêiner, o caminho ou caminhos para os arquivos de recurso XML precisam ser fornecidos ao construtor ClassPathXmlApplicationContext, permitindo que o contêiner carregue metadados de configuração a partir de uma variedade de recursos externos, como o sistema de arquivos local, o CLASSPATH do Java, entre outros.


```java
ApplicationContext context = new ClassPathXmlApplicationContext("services.xml", "daos.xml");
```

```kotlin
val context = ClassPathXmlApplicationContext("services.xml", "daos.xml")
```

Depois de aprender sobre o contêiner IoC do Spring, você pode querer saber mais sobre a abstração de Recursos do Spring (como descrito em Recursos), que fornece um mecanismo conveniente para ler um InputStream de locais definidos em uma sintaxe URI. Em particular, os caminhos de Recursos são usados para construir contextos de aplicativos, conforme descrito em Contextos de Aplicativos e Caminhos de Recursos.

O exemplo a seguir mostra o arquivo de configuração de objetos da camada de serviço (services.xml):

```xml
<?xml version="1.0" encoding="UTF-8"?>
<beans xmlns="http://www.springframework.org/schema/beans"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemaLocation="http://www.springframework.org/schema/beans
		https://www.springframework.org/schema/beans/spring-beans.xsd">

	<!-- services -->

	<bean id="petStore" class="org.springframework.samples.jpetstore.services.PetStoreServiceImpl">
		<property name="accountDao" ref="accountDao"/>
		<property name="itemDao" ref="itemDao"/>
		<!-- additional collaborators and configuration for this bean go here -->
	</bean>

	<!-- more bean definitions for services go here -->

</beans>
```

O exemplo a seguir mostra o arquivo daos.xml de objetos de acesso a dados:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<beans xmlns="http://www.springframework.org/schema/beans"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemaLocation="http://www.springframework.org/schema/beans
		https://www.springframework.org/schema/beans/spring-beans.xsd">

	<bean id="accountDao"
		class="org.springframework.samples.jpetstore.dao.jpa.JpaAccountDao">
		<!-- additional collaborators and configuration for this bean go here -->
	</bean>

	<bean id="itemDao" class="org.springframework.samples.jpetstore.dao.jpa.JpaItemDao">
		<!-- additional collaborators and configuration for this bean go here -->
	</bean>

	<!-- more bean definitions for data access objects go here -->

</beans>
```
No exemplo anterior, a camada de serviço consiste na classe PetStoreServiceImpl e em dois objetos de acesso a dados dos tipos JpaAccountDao e JpaItemDao (com base no padrão de Mapeamento Objeto-Relacional JPA). O elemento property se refere ao nome da propriedade JavaBean, e o elemento ref se refere ao nome de outra definição de bean. Essa ligação entre os elementos id e ref expressa a dependência entre objetos colaboradores. Para detalhes sobre a configuração das dependências de um objeto, consulte Dependências.