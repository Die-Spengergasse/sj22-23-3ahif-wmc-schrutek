Console.WriteLine("1. Before DoSomething()...");
DoSomething(); // 2.
Console.WriteLine("3. After DoSomething()...");

void DoSomething()
{
    Console.WriteLine("2. inside DoSomething()");
    Thread.Sleep(3000);
}

Console.ReadLine();

CheckSomething(className => className == "3AHIF");

bool IsClassEqual(string className)
{
    return className == "3AHIF";
}

void CheckSomething(Func<string, bool> predicate)
{
    bool isEqual = predicate("3AHIF");
}