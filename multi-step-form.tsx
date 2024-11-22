'use client'

import * as React from "react"
import { Check, ChevronDown, Menu } from "lucide-react"
import { cn } from "@/lib/utils"

import { Button } from "@/components/ui/button"
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { RadioGroup, RadioGroupItem } from "@/components/ui/radio-group"
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select"
import {
  Sheet,
  SheetContent,
  SheetDescription,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from "@/components/ui/sheet"

export default function Component() {
  const [step, setStep] = React.useState(1)
  const [isMobileMenuOpen, setIsMobileMenuOpen] = React.useState(false)
  const [formData, setFormData] = React.useState({
    // ... (all form fields remain the same)
  })

  const steps = [
    { id: 1, name: "Dados de contato", completed: step > 1 },
    { id: 2, name: "Sobre a empresa", completed: step > 2 },
    { id: 3, name: "Representante da empresa", completed: step > 3 },
    { id: 4, name: "Endereço do representante", completed: step > 4 },
    { id: 5, name: "Endereço da empresa", completed: step > 5 },
    { id: 6, name: "Onde receber", completed: step > 6 },
  ]

  const handleNext = () => setStep((prev) => Math.min(prev + 1, steps.length))
  const handleBack = () => setStep((prev) => Math.max(prev - 1, 1))

  const handleInputChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target
    setFormData((prev) => ({ ...prev, [name]: value }))
  }

  return (
    <div className="flex min-h-screen bg-gray-50/50">
      <div className="flex w-full max-w-7xl mx-auto flex-col md:flex-row">
        {/* Left sidebar - hidden on mobile, visible on desktop */}
        <div className="hidden md:block w-1/3 p-8">
          <div className="mb-8">
            <svg
              className="h-8"
              viewBox="0 0 100 30"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect width="100" height="30" fill="#ffffff" />
              <text x="10" y="20" className="text-xl font-bold">
                pagar.me
              </text>
            </svg>
          </div>
          <div className="mb-8">
            <h2 className="text-2xl font-semibold mb-2">
              Comece a{" "}
              <span className="text-[#8CC84B]">vender hoje</span>
              <br />
              com o Pagar.me!
            </h2>
            <p className="text-gray-600">
              Para que você tenha acesso às nossas facilidades, gostaríamos de te conhecer melhor - e também o seu negócio.
              Cadastre-se, leva poucos minutos!
            </p>
          </div>
          <nav className="space-y-1">
            {steps.map((s) => (
              <div
                key={s.id}
                className={cn(
                  "flex items-center gap-3 p-3 rounded-lg",
                  step === s.id && "bg-[#8CC84B]/10",
                  s.completed && "text-[#8CC84B]"
                )}
              >
                <div
                  className={cn(
                    "flex h-6 w-6 shrink-0 items-center justify-center rounded-full border",
                    step === s.id && "border-[#8CC84B]",
                    s.completed && "bg-[#8CC84B] border-[#8CC84B]"
                  )}
                >
                  {s.completed ? (
                    <Check className="h-4 w-4 text-white" />
                  ) : (
                    <div
                      className={cn(
                        "h-2 w-2 rounded-full",
                        step === s.id ? "bg-[#8CC84B]" : "bg-gray-300"
                      )}
                    />
                  )}
                </div>
                <span className="text-sm font-medium">{s.name}</span>
              </div>
            ))}
          </nav>
        </div>

        {/* Mobile header */}
        <div className="md:hidden flex justify-between items-center p-4 bg-white shadow-sm">
          <svg
            className="h-8"
            viewBox="0 0 100 30"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="100" height="30" fill="#ffffff" />
            <text x="10" y="20" className="text-xl font-bold">
              pagar.me
            </text>
          </svg>
          <Sheet open={isMobileMenuOpen} onOpenChange={setIsMobileMenuOpen}>
            <SheetTrigger asChild>
              <Button variant="ghost" size="icon">
                <Menu className="h-6 w-6" />
                <span className="sr-only">Toggle menu</span>
              </Button>
            </SheetTrigger>
            <SheetContent side="left">
              <SheetHeader>
                <SheetTitle>Etapas do cadastro</SheetTitle>
                <SheetDescription>
                  Acompanhe seu progresso no cadastro
                </SheetDescription>
              </SheetHeader>
              <nav className="mt-4 space-y-1">
                {steps.map((s) => (
                  <div
                    key={s.id}
                    className={cn(
                      "flex items-center gap-3 p-3 rounded-lg",
                      step === s.id && "bg-[#8CC84B]/10",
                      s.completed && "text-[#8CC84B]"
                    )}
                  >
                    <div
                      className={cn(
                        "flex h-6 w-6 shrink-0 items-center justify-center rounded-full border",
                        step === s.id && "border-[#8CC84B]",
                        s.completed && "bg-[#8CC84B] border-[#8CC84B]"
                      )}
                    >
                      {s.completed ? (
                        <Check className="h-4 w-4 text-white" />
                      ) : (
                        <div
                          className={cn(
                            "h-2 w-2 rounded-full",
                            step === s.id ? "bg-[#8CC84B]" : "bg-gray-300"
                          )}
                        />
                      )}
                    </div>
                    <span className="text-sm font-medium">{s.name}</span>
                  </div>
                ))}
              </nav>
            </SheetContent>
          </Sheet>
        </div>

        {/* Main content */}
        <div className="flex-1 p-4 md:p-8">
          <Card className="w-full max-w-2xl mx-auto">
            {step === 1 && (
              <>
                <CardHeader>
                  <CardTitle>Dados de contato</CardTitle>
                  <CardDescription>
                    Para começarmos a cadastrar sua empresa no Pagar.me, precisamos de alguns dados sobre você.
                  </CardDescription>
                </CardHeader>
                <CardContent className="space-y-6">
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="name">Nome</Label>
                      <Input
                        id="name"
                        name="name"
                        value={formData.name}
                        onChange={handleInputChange}
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="surname">Sobrenome (Completo)</Label>
                      <Input
                        id="surname"
                        name="surname"
                        value={formData.surname}
                        onChange={handleInputChange}
                      />
                    </div>
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="email">Seu e-mail</Label>
                    <Input
                      id="email"
                      name="email"
                      type="email"
                      value={formData.email}
                      onChange={handleInputChange}
                    />
                    <p className="text-sm text-gray-500">
                      Seu e-mail será usado como login da sua conta aqui no Pagar.me.
                    </p>
                  </div>
                  <div className="space-y-2">
                    <Label>Você é o representante da empresa?</Label>
                    <RadioGroup
                      defaultValue={formData.isRepresentative}
                      onValueChange={(value) =>
                        setFormData((prev) => ({ ...prev, isRepresentative: value }))
                      }
                    >
                      <div className="flex items-center space-x-2">
                        <RadioGroupItem value="yes" id="yes" />
                        <Label htmlFor="yes">Sim</Label>
                      </div>
                      <div className="flex items-center space-x-2">
                        <RadioGroupItem value="no" id="no" />
                        <Label htmlFor="no">Não</Label>
                      </div>
                    </RadioGroup>
                  </div>
                  <div className="pt-4">
                    <Button
                      className="w-full bg-[#6C47FF] hover:bg-[#6C47FF]/90"
                      onClick={handleNext}
                    >
                      CONTINUAR
                    </Button>
                  </div>
                </CardContent>
              </>
            )}

            {/* ... (other steps remain the same) */}

            {step === 6 && (
              <>
                <CardHeader>
                  <CardTitle>Onde receber</CardTitle>
                  <CardDescription>
                    Para enviarmos o repasse das suas transações com o Pagar.me, precisamos de uma conta bancária ativa associada ao seu CNPJ.
                  </CardDescription>
                </CardHeader>
                <CardContent className="space-y-6">
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="bank">Banco</Label>
                      <Select
                        value={formData.bank}
                        onValueChange={(value) =>
                          setFormData((prev) => ({ ...prev, bank: value }))
                        }
                      >
                        <SelectTrigger id="bank">
                          <SelectValue placeholder="Digite para buscar" />
                        </SelectTrigger>
                        <SelectContent>
                          <SelectItem value="001">Banco do Brasil</SelectItem>
                          <SelectItem value="341">Itaú</SelectItem>
                          <SelectItem value="033">Santander</SelectItem>
                        </SelectContent>
                      </Select>
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="accountType">Tipo de conta</Label>
                      <Select
                        value={formData.accountType}
                        onValueChange={(value) =>
                          setFormData((prev) => ({ ...prev, accountType: value }))
                        }
                      >
                        <SelectTrigger id="accountType">
                          <SelectValue placeholder="Digite para buscar" />
                        </SelectTrigger>
                        <SelectContent>
                          <SelectItem value="checking">Conta Corrente</SelectItem>
                          <SelectItem value="savings">Conta Poupança</SelectItem>
                        </SelectContent>
                      </Select>
                    </div>
                  </div>
                  <div className="grid grid-cols-3 gap-4">
                    <div className="col-span-2 space-y-2">
                      <Label htmlFor="agency">Agência</Label>
                      <Input
                        id="agency"
                        name="agency"
                        placeholder="Apenas números"
                        value={formData.agency}
                        onChange={handleInputChange}
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="agencyDigit">Dígito</Label>
                      <Input
                        id="agencyDigit"
                        name="agencyDigit"
                        placeholder="0"
                        value={formData.agencyDigit}
                        onChange={handleInputChange}
                      />
                    </div>
                  </div>
                  <div className="grid grid-cols-3 gap-4">
                    <div className="col-span-2 space-y-2">
                      <Label htmlFor="account">Conta</Label>
                      <Input
                        id="account"
                        name="account"
                        placeholder="Apenas números"
                        value={formData.account}
                        onChange={handleInputChange}
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="accountDigit">Dígito</Label>
                      <Input
                        id="accountDigit"
                        name="accountDigit"
                        placeholder="00"
                        value={formData.accountDigit}
                        onChange={handleInputChange}
                      />
                    </div>
                  </div>
                  <p className="text-sm text-gray-500">
                    A conta bancária informada precisa estar associada ao CNPJ da empresa.
                  </p>
                  <div className="flex justify-between pt-4">
                    <Button variant="outline" onClick={handleBack}>
                      Voltar
                    </Button>
                    <Button
                      className="bg-[#6C47FF] hover:bg-[#6C47FF]/90"
                      onClick={() => {
                        // Here you would typically submit the form data
                        console.log("Form submitted:", formData)
                      }}
                    >
                      FINALIZAR CADASTRO
                    </Button>
                  </div>
                </CardContent>
              </>
            )}
          </Card>
        </div>
      </div>
    </div>
  )
}