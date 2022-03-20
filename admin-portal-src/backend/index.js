import env from "./utils/init.js";
import app from "./app.js";

app.listen(env.PORT, () => {
  console.log(`Listening on port ${env.PORT}`);
});
