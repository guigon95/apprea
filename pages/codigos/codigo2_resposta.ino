#include <Ultrasonic.h>

#define BUZZER 5

Ultrasonic ultrasonic(12,11); // (Trig PIN,Echo PIN)

int distancia;

void setup() {
}

void loop()
{
  distancia = ultrasonic.Ranging(CM);
  
  if(distancia < 51){ //apita abaixo de 50 cm
    delay(50);        //intervalo para leitura do sensor
    tone(BUZZER, 2650, 1000); //2650Hz 100ms
  }  
}
