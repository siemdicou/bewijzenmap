import sys
# lees argumenten cli bij start programma
"""
print 'Number of arguments:', len(sys.argv), 'arguments.'
print 'Argument List:', str(sys.argv)
"""


while 1:
	print (30 * '*')
	print "Age calculator type ctrl-c to stop me"
	print (30 * '=')
	naam = raw_input ("Geef jouw naam ")
	print "\n"
	print ("Is %s this your real name?? "%naam)
	yesNo = raw_input ("Y N\n")
	if yesNo == "Y" or yesNo == "y":
		print "Welkom ", naam
	else:
		naam = "Alias " + naam
	print naam, "wat is your age in years?? "
	leeftijd = eval(raw_input (""))
	if type(leeftijd) == int:
		print naam, " your age is " , leeftijd
	else:
		print naam, "wat is your age in years?? Please enter a number"
		leeftijd = raw_input ("")
		if type(leeftijd) == int:
			print "thank you " ,naam, " your age is " , leeftijd, "years"
		else:
			print "too bad you can't enter your age"
			break
	month = leeftijd * 12
	print "you have lived for ", month, "months\n\n"
