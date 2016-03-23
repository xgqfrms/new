# 修改apache的目录访问权限！

# 禁止user访问目录结构！



[apache 限制目录访问:](http://www.lxway.com/3316244.html) 

[apache禁止访问目录列表":](http://www.360doc.com/relevant/77122968_more.shtml)

？？？？？？
??????
---

？？？？？？
??????

***

？？？？？？
??????

___


？？？？？？
??????

*** 
    Apache具有灵活的设置，所有Apache的安全特性都要经过周密的设计与规划，进行认真地配置才能够实现。
    Apache安全配置包括很多层面，有运行环境、认证与授权设置等。
***

Apache的安装配置和运行示例如下：
* 1 修改apache的版本信息，使外部访问看到的apache信息是经过伪装或错误的，这个可以尽可能的保证apache的安全。

* 2 建立安全的apache的目录结构。
	 ServerRoot  DocumentRoot  ScripAlias   Customlog  Errorlog   均放在单独的目录环境中。以上主要目录相互独立并且不存在父子逻辑关系。 
	 ServerRoot目录只能具有管理权限用户访问；
	 DocumentRoot能够被管理Web站点内容的用户访问和使用Apache服务器的Apache用户和Apache用户组访问；
	 只有admin组的用户可以访问日志目录。  
	 各个目录设置独立的权限
 
* 4、禁止默认访问的存在，只对指定的目录开启访问权限。

* 5 更改apache的默认路径，单独建立路径提供apache文件的存放 

* 6、通过使用例如“Apache DoS Evasive Maneuvers Module ”等工具来实现Apache服务器对DoS攻击的防范。其工具可以快速拒绝来自相同地址对同一URL的重复请求。 

* 7、以Nobody用户运行 一般情况下，Apache是由Root 来安装和运行的。如果Apache Server进程具有Root用户特权，那么它将给系统的安全构成很大的威胁，应确保Apache Server进程以最可能低的权限用户来运行。通过修改httpd.conf文件中的下列选项，以Nobody用户运行Apache 达到相对安全的目的。 User nobody Group# -1 

* 2、ServerRoot目录的权限 为了确保所有的配置是适当的和安全的，需要严格控制Apache 主目录的访问权限，使非超级用户不能修改该目录中的内容。Apache 的主目录对应于Apache Server配置文件httpd.conf的Server Root控制项中，应为： Server Root /usr/local/apache 

* 3、SSI的配置 在配置文件access.conf 或httpd.conf中的确Options指令处加入Includes NO EXEC选项，用以禁用Apache Server 中的执行功能。避免用户直接执行Apache 服务器中的执行程序，而造成服务器系统的公开化。 Options Includes Noexec 

* 4、阻止用户修改系统设置 在Apache 服务器的配置文件中进行以下的设置，阻止用户建立、修改 .htaccess文件，防止用户超越能定义的系统安全特性。 AllowOveride None Options None Allow from all 然后再分别对特定的目录进行适当的配置。 

* 5、改变Apache 服务器的确省访问特性 Apache 的默认设置只能保障一定程度的安全，如果服务器能够通过正常的映射规则找到文件，那么客户端便会获取该文件，如 http://local host/~ root/ 将允许用户访问整个文件系统。在服务器文件中加入如下内容： order deny,ellow Deny from all 将禁止对文件系统的缺省访问。 

* 6、CGI脚本的安全考虑 CGI脚本是一系列可以通过Web服务器来运行的程序。为了保证系统的安全性，应确保CGI的作者是可信的。对CGI而言，最好将其限制在一个特定的 目录下，如cgi-bin之下，便于管理；另外应该保证CGI目录下的文件是不可写的，避免一些欺骗性的程序驻留或混迹其中；如果能够给用户提供一个安全 性良好的CGI程序的模块作为参考，也许会减少许多不必要的麻烦和安全隐患；除去CGI目录下的所有非业务应用的脚本，以防异常的信息泄漏。 以上这些常用的举措可以给Apache Server 一个基本的安全运行环境，显然在具体实施上还要做进一步的细化分解，制定出符合实际应用的安全配置方案。

Apache Server基于主机的访问控制 Apache Server默认情况下的安全配置是拒绝一切访问。假定Apache Server内容存放在/usr/local/apache/share 目录下，下面的指令将实现这种设置： Deny from all Allow Override None 则禁止在任一目录下改变认证和访问控制方法。 同样，可以用特有的命令Deny、Allow指定某些用户可以访问，哪些用户不能访问，提供一定的灵活性。当Deny、Allow一起用时，用命令Order决定Deny和Allow合用的顺序，如下所示： 

	 1、 拒绝某类地址的用户对服务器的访问权（Deny） 如：Deny from all Deny from test.cnn.com Deny from 204.168.190.13 Deny from 10.10.10.0/255.255.0.0 

	 2、 允许某类地址的用户对服务器的访问权（Allow） 如：Allow from all Allow from test.cnn.com Allow from 204.168.190.13 Allow from 10.10.10.0/255.255.0.0 Deny和Allow指令后可以输入多个变量。 

	 3、简单配置实例： Order Allow, Deny Allow from all Deny from www.test.com 指想让所有的人访问Apache服务器，但不希望来自 www.test.com的任何访问。 Order Deny, Allow Deny from all Allow from test.cnn.com 指不想让所有人访问，但希望给test.cnn.com网站的来访。

Apache Sever的用户认证与授权 概括的讲，用户认证就是验证用户的身份的真实性，如用户帐号是否在数据库中，及用户帐号所对应的密码是否正确；用户授权表示检验有效用户是否被许可访 问特定的资源。在Apache中，几乎所有的安全模块实际上兼顾这两个方面。从安全的角度来看，用户的认证和授权相当于选择性访问控制。
建立用户的认证授权需要三个步骤： 

	 1、建立用户库 用户名和口令列表需要存在于文件（mod_auth模块）或数据库（mod_auth_dbm模块）中。基于安全的原因，该文件不能存放在文挡的根目 录下。如，存放在/usr/local/etc/httpd下的users文件，其格式与UNIX口令文件格式相似，但口令是以加密的形式存放的。应用程 序htpasswd可以用来添加或更改程序： htpasswd –c /usr/local/etc/httpd/users martin -c表明添加新用户，martin为新添加的用户名，在程序执行过程中，两次输入口令回答。用户名和口令添加到users文件中。产生的用户文件有如下的形式： martin:WrU808BHQai36 jane:iABCQFQs40E8M art:FadHN3W753sSU 第一域是用户名，第二个域是用户密码。 

	 2、配置服务器的保护域 为了使Apache服务器能够利用用户文件中的用户名和口令信息，需要设置保护域（Realm）。一个域实际上是站点的一部分（如一个目录、文档等） 或整个站点只供部分用户访问。在相关目录下的.htaccess文件或httpd.conf ( acces.conf ) 中的段中，由AuthName来指定被保护层的域。在.htaccess文件中对用户文件有效用户的授权访问及指定域保护有如下指定： AuthName “restricted stuff” Authtype Basic AuthUserFile /usr/local/etc/httpd/users Require valid-user 其中，AuthName指出了保护域的域名（Realm Name）。valid-user参数意味着user文件中的所有用户都是可用的。一旦用户输入了一个有效的用户/口令时，同一个域内的其他资源都可以利 用同样的用户/口令来进行访问，同样可以使两个不同的区域共用同样的用户/口令。 

	 3、告诉服务器哪些用户拥有资源的访问权限 如果想将一资源的访问权限授予一组客户，可以将他们的名字都列在Require之后。最好的办法是利用组（group）文件。组的操作和标准的UNIX的组的概念类似，任一个用户可以属于一个和数个组。这样就可以在配置文件中利用Require对组赋予某些权限。如： Require group staff Require group staff admin Require user adminuser 指定了一个组、几个组或一个用户的访问权限。
