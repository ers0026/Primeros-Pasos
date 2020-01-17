<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class Form1
    Inherits System.Windows.Forms.Form

    'Form reemplaza a Dispose para limpiar la lista de componentes.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Requerido por el Diseñador de Windows Forms
    Private components As System.ComponentModel.IContainer

    'NOTA: el Diseñador de Windows Forms necesita el siguiente procedimiento
    'Se puede modificar usando el Diseñador de Windows Forms.  
    'No lo modifique con el editor de código.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Me.G_Conversion = New System.Windows.Forms.GroupBox()
        Me.CaK = New System.Windows.Forms.RadioButton()
        Me.KaC = New System.Windows.Forms.RadioButton()
        Me.B_Calcular = New System.Windows.Forms.Button()
        Me.B_Reinicio = New System.Windows.Forms.Button()
        Me.B_Salir = New System.Windows.Forms.Button()
        Me.Text_GraOriginal = New System.Windows.Forms.TextBox()
        Me.Text_GraFinal = New System.Windows.Forms.TextBox()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.Label2 = New System.Windows.Forms.Label()
        Me.G_Conversion.SuspendLayout()
        Me.SuspendLayout()
        '
        'G_Conversion
        '
        Me.G_Conversion.Controls.Add(Me.KaC)
        Me.G_Conversion.Controls.Add(Me.CaK)
        Me.G_Conversion.Location = New System.Drawing.Point(25, 30)
        Me.G_Conversion.Name = "G_Conversion"
        Me.G_Conversion.Size = New System.Drawing.Size(200, 100)
        Me.G_Conversion.TabIndex = 1
        Me.G_Conversion.TabStop = False
        Me.G_Conversion.Text = "Conversion"
        '
        'CaK
        '
        Me.CaK.AutoSize = True
        Me.CaK.Location = New System.Drawing.Point(22, 35)
        Me.CaK.Name = "CaK"
        Me.CaK.Size = New System.Drawing.Size(116, 17)
        Me.CaK.TabIndex = 0
        Me.CaK.TabStop = True
        Me.CaK.Text = "De Celsius a Kelvin"
        Me.CaK.UseVisualStyleBackColor = True
        '
        'KaC
        '
        Me.KaC.AutoSize = True
        Me.KaC.Location = New System.Drawing.Point(22, 68)
        Me.KaC.Name = "KaC"
        Me.KaC.Size = New System.Drawing.Size(116, 17)
        Me.KaC.TabIndex = 1
        Me.KaC.TabStop = True
        Me.KaC.Text = "De Kelvin a Celsius"
        Me.KaC.UseVisualStyleBackColor = True
        '
        'B_Calcular
        '
        Me.B_Calcular.Location = New System.Drawing.Point(47, 170)
        Me.B_Calcular.Name = "B_Calcular"
        Me.B_Calcular.Size = New System.Drawing.Size(75, 23)
        Me.B_Calcular.TabIndex = 2
        Me.B_Calcular.Text = "Calcular"
        Me.B_Calcular.UseVisualStyleBackColor = True
        '
        'B_Reinicio
        '
        Me.B_Reinicio.Location = New System.Drawing.Point(47, 218)
        Me.B_Reinicio.Name = "B_Reinicio"
        Me.B_Reinicio.Size = New System.Drawing.Size(75, 23)
        Me.B_Reinicio.TabIndex = 3
        Me.B_Reinicio.Text = "Resetear"
        Me.B_Reinicio.UseVisualStyleBackColor = True
        '
        'B_Salir
        '
        Me.B_Salir.Location = New System.Drawing.Point(47, 270)
        Me.B_Salir.Name = "B_Salir"
        Me.B_Salir.Size = New System.Drawing.Size(75, 23)
        Me.B_Salir.TabIndex = 4
        Me.B_Salir.Text = "Salir"
        Me.B_Salir.UseVisualStyleBackColor = True
        '
        'Text_GraOriginal
        '
        Me.Text_GraOriginal.Location = New System.Drawing.Point(331, 170)
        Me.Text_GraOriginal.Name = "Text_GraOriginal"
        Me.Text_GraOriginal.Size = New System.Drawing.Size(100, 20)
        Me.Text_GraOriginal.TabIndex = 5
        '
        'Text_GraFinal
        '
        Me.Text_GraFinal.Location = New System.Drawing.Point(331, 220)
        Me.Text_GraFinal.Name = "Text_GraFinal"
        Me.Text_GraFinal.Size = New System.Drawing.Size(100, 20)
        Me.Text_GraFinal.TabIndex = 6
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Location = New System.Drawing.Point(171, 170)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(41, 13)
        Me.Label1.TabIndex = 7
        Me.Label1.Text = "Grados"
        '
        'Label2
        '
        Me.Label2.AutoSize = True
        Me.Label2.Location = New System.Drawing.Point(174, 218)
        Me.Label2.Name = "Label2"
        Me.Label2.Size = New System.Drawing.Size(99, 13)
        Me.Label2.TabIndex = 8
        Me.Label2.Text = "Grados convertidos"
        '
        'Form1
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(512, 450)
        Me.Controls.Add(Me.Label2)
        Me.Controls.Add(Me.Label1)
        Me.Controls.Add(Me.Text_GraFinal)
        Me.Controls.Add(Me.Text_GraOriginal)
        Me.Controls.Add(Me.B_Salir)
        Me.Controls.Add(Me.B_Reinicio)
        Me.Controls.Add(Me.B_Calcular)
        Me.Controls.Add(Me.G_Conversion)
        Me.Name = "Form1"
        Me.Text = "Form1"
        Me.G_Conversion.ResumeLayout(False)
        Me.G_Conversion.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub

    Friend WithEvents G_Conversion As GroupBox
    Friend WithEvents KaC As RadioButton
    Friend WithEvents CaK As RadioButton
    Friend WithEvents B_Calcular As Button
    Friend WithEvents B_Reinicio As Button
    Friend WithEvents B_Salir As Button
    Friend WithEvents Text_GraOriginal As TextBox
    Friend WithEvents Text_GraFinal As TextBox
    Friend WithEvents Label1 As Label
    Friend WithEvents Label2 As Label
End Class
