Python 2.7.11 (v2.7.11:6d1b6a68f775, Dec  5 2015, 12:54:16) 
[GCC 4.2.1 (Apple Inc. build 5666) (dot 3)] on darwin
Type "copyright", "credits" or "license()" for more information.
>>> WARNING: The version of Tcl/Tk (8.5.9) in use may be unstable.
Visit http://www.python.org/download/mac/tcltk/ for current information.
running = True 

while running:
    print("1 = Addition")
    print("2 = Subtraction")
    print("3 = Multiplication")
    print("4 = Division")
    print("5 = Exit program")
    cmd = int(input("Enter number : "))
    if cmd == 1:
        print("Addition")
        first = int(input("Enter first number :"))
        secund = int(input("Enter secund number :"))
        result = first + secund
        print(first ,'+' ,secund ,'=' , result)
    elif cmd == 2:
        print("Subtraction")
        first = int(input("Enter first number :"))
        secund = int(input("Enter secund number :"))
        result = first - secund
        print(first ,"-" ,secund ,"=" , result)
    elif cmd == 3:
        print("Mmltiplication")
        first = int(input("Enter first number :"))
        secund = int(input("Enter secund number :"))
        result = first * secund
        print(first ,"*" ,secund ,"=" , result)
    elif cmd == 4:
        print("Division")
        first = int(input("Enter first number :"))
        secund = int(input("Enter secund number :"))
        result = first / secund
        print(first ,"/" ,secund ,"=" , result)
    elif cmd == 5:
        print("Quit!")
        running = FalsePython 2.7.11 (v2.7.11:6d1b6a68f775, Dec  5 2015, 12:54:16)
        [GCC 4.2.1 (Apple Inc. build 5666) (dot 3)] on darwin
        Type "copyright", "credits" or "license()" for more information.
        >>> WARNING: The version of Tcl/Tk (8.5.9) in use may be unstable.
        Visit http://www.python.org/download/mac/tcltk/ for current information.
