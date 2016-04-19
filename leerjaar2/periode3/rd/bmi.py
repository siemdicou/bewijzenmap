# unit = raw_input("Choose units of which input would be entered(Imperial/Metric): ")
# if "Imperial"in unit or "imperial" in unit:
#     pounds = input("Input weight in pounds: ")
#     height = input("Input height in inches: ")
#     bmi = (pounds*703)/(height*height)
#     bmis = str(bmi)
#     print ("Your BMI is: "+bmis)
# if "Metric" in unit or "metric" in unit:
#     "welkom"
#     kilog = input("Input weight in kilograms: ")
#     if str.isnumeric(kilog):
#         height = input("Input height in meters: ")
#             if str.isnumeric(height):
#             bmi = kilog/(height*height)
#             bmis = str(bmi)
#             print ("Your BMI is: "+bmis)
#         else 
#         "voer een getal in"
#         height = input("Input height in meters: ")
#     else
#     "voer een getal in"
#         kilog = input("Input weight in kilograms: ")
import sys
def getInput(text):
    while 1:
        user_input= raw_input(text)
        try:
            user_input= int(user_input)
            break
        except valueError:
            try:
                user_input= float(user_input)
                break
            except valueError:
                print "de ingevulde  waarde", user_input,"is niet corect"
                continue
    return user_input
def bmiCalc(lengte,gewicht,eenheid):
    if eenheid == "imperial":
        gewicht = gewicht * 0.45359237
        lengte = lengte * 0.3048
    bmi = gewicht / (lengte * lengte)
    return bmi
if len(sys.argv)>1:
    if sys.argv[1] == "imperial":
        eenheid = "imperial"
else:
    eenheid ==  "metrisch"    


# if bmi < 18.5:
#     state = str("ondegewicht heeft")
# if 18.5 <= bmi < 24.9:
#     state = str("normaal gewicht heeft")
# if 25.0 <= bmi < 29.9:
#     state = str("opletten moet")
# if 30 < bmi:
#     state = str("obese bent")
# print ("Uw bmi laat zien dat u "+state)