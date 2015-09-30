#include <stdio.h>
//Siem dicou

float lengte;
float gewicht;
float bmi;
float BMIcalc(float gewicht,float lengte);


int main()
{
    int this_is_a_number;

    printf( "Please enter your weight: " );
    scanf( "%f", &gewicht );
    printf( "You entered %f", gewicht );
    getchar();
    printf( "Please enter your length: " );
    scanf( "%f", &lengte );
    bmi = BMIcalc(gewicht,lengte);
    printf("your length is %f yor weihgt is %f, your bmi is %f", gewicht, lengte,  bmi);

 if (bmi <  20){
            printf("Your BMI is %f that means... \n You are a bit skinny  \n" , bmi);
}
if (bmi >= 20 && bmi < 30){
            printf("Your BMI is %f that means... \n You are considerd normal \n" , bmi);
}
if (bmi >= 30 && bmi < 40){
            printf("Your BMI is %f that means... \n You are a bit fat  \n" , bmi);
}
if ( bmi >= 40){
            printf("Your BMI is %f that means... \n obese! \n" , bmi);
}


    return 0;
}

float BMIcalc(float gewicht,float lengte){
    float BMI;
    BMI = gewicht/ (lengte * lengte);
    return BMI;
}
