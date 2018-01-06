FROM daocloud.io/ubuntu:14.04

RUN ping -c 3 ubuntu.com
RUN ping -c 3 keyserver.ubuntu.com
# RUN ping -c 3 hhvm.com
# RUN ping -c 3 dl.hhvm.com

RUN apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0x5a16e7281be7a449

RUN cat /etc/apt/sources.list

RUN sudo sed -i 's%archive.ubuntu.com%cn.archive.ubuntu.com%' /etc/apt/sources.list

RUN cat /etc/apt/sources.list

RUN apt-get update -y \
    && apt-get install -y apt-transport-https \
    && apt-get install -y software-properties-common

# && add-apt-repository "deb http://dl.hhvm.com/ubuntu $(lsb_release -sc) main"

RUN add-apt-repository "deb http://mirror.mephi.ru/hhvm/ubuntu $(lsb_release -sc) main" \
    && apt-get update -y \
    && apt-get install -y hhvm curl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN mkdir -p /home/app

ADD server.ini /etc/hhvm/server.ini

RUN usermod -u 1000 www-data

WORKDIR /home/app

CMD ["/usr/bin/hhvm", "-m", "server", "-c", "/etc/hhvm/server.ini"]

EXPOSE 9000
