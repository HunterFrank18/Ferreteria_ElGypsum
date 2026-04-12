import pandas as pd

# Cargar el archivo JSON
df = pd.read_json('data-1.json')

# Guardar como CSV
df.to_csv('archivos.csv', index=False)
